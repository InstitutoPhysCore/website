<?php

use App\Filament\Resources\Artigo\ArtigoResource;
use App\Filament\Resources\Artigo\ArtigoResource\Pages\CreateArtigo;
use App\Filament\Resources\Artigo\ArtigoResource\Pages\EditArtigo;
use App\Filament\Resources\Artigo\ArtigoResource\Pages\ListArtigos;
use App\Filament\Resources\UserResource;
use Livewire\Livewire;

test('visitante anônimo é redirecionado ao login do painel', function () {
    $this->get('/painel')->assertRedirect('/painel/login');
    $this->get('/painel/artigo/artigos')->assertRedirect('/painel/login');
});

test('usuário comum autenticado não acessa o painel', function () {
    $this->actingAs(visitante());

    $this->get('/painel')->assertForbidden();
    $this->get('/painel/artigo/artigos')->assertForbidden();
});

test('administrador acessa o painel', function () {
    $this->actingAs(admin());

    $this->get('/painel')->assertOk();
    $this->get('/painel/artigo/artigos')->assertOk();
});

test('usuário comum não consegue escrever via requisições diretas ao Livewire', function () {
    $this->actingAs(visitante());
    $artigo = artigo();

    Livewire::test(ListArtigos::class)->assertForbidden();
    Livewire::test(CreateArtigo::class)->assertForbidden();
    Livewire::test(EditArtigo::class, ['record' => $artigo->getRouteKey()])->assertForbidden();

    expect(ArtigoResource::canCreate())->toBeFalse()
        ->and(ArtigoResource::canEdit($artigo))->toBeFalse()
        ->and(ArtigoResource::canDelete($artigo))->toBeFalse();
});

test('o registro público nunca cria administradores', function () {
    $this->post('/register', [
        'name' => 'Intruso', 'email' => 'x@example.com', 'password' => 'password', 'password_confirmation' => 'password',
        'is_admin' => true,
    ]);

    expect(App\Models\User::where('email', 'x@example.com')->first()->is_admin)->toBeFalse();
});

test('nenhum administrador consegue excluir a si mesmo nem o último admin', function () {
    $a = admin();
    $this->actingAs($a);

    expect(UserResource::canDelete($a))->toBeFalse();
    expect($a->deleteBlockers())->not->toBeEmpty();
});

test('comando physcore:admin concede e revoga acesso', function () {
    $u = visitante();

    $this->artisan('physcore:admin', ['email' => $u->email])->assertSuccessful();
    expect($u->fresh()->is_admin)->toBeTrue();

    $this->artisan('physcore:admin', ['email' => $u->email, '--revoke' => true])->assertSuccessful();
    expect($u->fresh()->is_admin)->toBeFalse();
});
