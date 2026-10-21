<?php

namespace App\Support;

use App\Models\Apostila\Apostila;
use App\Models\Apostila\Categoria as ApostilaCategoria;
use App\Models\Artigo\Artigo;
use App\Models\Artigo\Categoria as ArtigoCategoria;
use App\Models\Biblioteca\Categoria as BibliotecaCategoria;
use App\Models\Biblioteca\Livro;
use App\Models\Curso\Categoria as CursoCategoria;
use App\Models\Curso\Serie as CursoSerie;
use App\Models\Software\Categoria as SoftwareCategoria;
use App\Models\Software\Software;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

/*
Descreve as listagens públicas que possuem categorias (artigos, cursos, apostilas, biblioteca e softwares)
para que uma única implementação (Livewire Catalogo / Destaques) sirva todas elas.
*/
class Catalogo
{
    public static function tipos(): array
    {
        return [
            'artigos' => [
                'model' => Artigo::class,
                'categoria' => ArtigoCategoria::class,
                'categoria_rel' => 'artigos',
                'via_serie' => false,
                'titulo' => 'Artigos',
                'subtitulo' => 'Todos os artigos do PhysCore',
                'singular' => 'artigo',
                'coluna_titulo' => 'title',
                'rota' => 'artigos.show',
                'with' => ['categoria'],
                'meta' => fn (Model $m) => $m->categoria?->name,
            ],
            'cursos' => [
                'model' => CursoSerie::class,
                'categoria' => CursoCategoria::class,
                'categoria_rel' => 'series',
                'via_serie' => false,
                'titulo' => 'Cursos',
                'subtitulo' => 'Acesse todos os nossos cursos',
                'singular' => 'curso',
                'coluna_titulo' => 'title',
                'rota' => 'cursos.show',
                'with' => ['categoria'],
                'count' => 'aulas',
                'meta' => fn (Model $m) => collect([$m->categoria?->name, isset($m->aulas_count) ? $m->aulas_count.' aula(s)' : null])->filter()->implode(' · '),
            ],
            'apostilas' => [
                'model' => Apostila::class,
                'categoria' => ApostilaCategoria::class,
                'categoria_rel' => 'apostilas',
                'via_serie' => true,
                'titulo' => 'Apostilas',
                'subtitulo' => 'Todas as apostilas do PhysCore',
                'singular' => 'apostila',
                'coluna_titulo' => 'title',
                'rota' => 'apostilas.show',
                'with' => ['serie.categoria'],
                'meta' => fn (Model $m) => self::metaSerie($m),
            ],
            'biblioteca' => [
                'model' => Livro::class,
                'categoria' => BibliotecaCategoria::class,
                'categoria_rel' => 'livros',
                'via_serie' => true,
                'titulo' => 'Biblioteca',
                'subtitulo' => 'Todos os livros da biblioteca do PhysCore',
                'singular' => 'livro',
                'coluna_titulo' => 'title',
                'rota' => 'biblioteca.show',
                'with' => ['serie.categoria'],
                'meta' => fn (Model $m) => self::metaSerie($m),
            ],
            'softwares' => [
                'model' => Software::class,
                'categoria' => SoftwareCategoria::class,
                'categoria_rel' => 'softwares',
                'via_serie' => false,
                'titulo' => 'Softwares',
                'subtitulo' => 'Softwares desenvolvidos pelo PhysCore',
                'singular' => 'software',
                'coluna_titulo' => 'name',
                'rota' => 'softwares.show',
                'with' => ['categoria'],
                'meta' => fn (Model $m) => $m->categoria?->name,
            ],
        ];
    }

    public static function config(string $tipo): array
    {
        return self::tipos()[$tipo] ?? throw new InvalidArgumentException("Tipo de catálogo desconhecido: {$tipo}");
    }

    private static function metaSerie(Model $m): ?string
    {
        $partes = [$m->serie?->categoria?->name, $m->serie?->title];
        if ($m->volume) {
            $partes[] = 'Vol. '.$m->volume;
        }

        return collect($partes)->filter()->implode(' · ') ?: null;
    }

    // Consulta base (com busca, categoria e ordenação já validadas)
    public static function consulta(string $tipo, ?string $busca = null, ?int $categoria = null, string $ordem = 'recentes'): Builder
    {
        $c = self::config($tipo);

        $query = $c['model']::query()->with($c['with']);

        if (isset($c['count'])) {
            $query->withCount($c['count']);
        }

        if (filled($busca)) {
            $termo = '%'.addcslashes(trim($busca), '%_\\').'%';
            $query->where(fn (Builder $q) => $q->where($c['coluna_titulo'], 'like', $termo)->orWhere('desc', 'like', $termo));
        }

        if ($categoria) {
            $c['via_serie']
                ? $query->whereHas('serie', fn (Builder $q) => $q->where('categoria_id', $categoria))
                : $query->where('categoria_id', $categoria);
        }

        return match ($ordem) {
            'antigos' => $query->oldest()->oldest('id'),
            'az' => $query->orderBy($c['coluna_titulo']),
            default => $query->latest()->latest('id'),
        };
    }

    // Categorias que possuem conteúdo, com a contagem de itens
    public static function categorias(string $tipo)
    {
        $c = self::config($tipo);

        return $c['categoria']::query()->has($c['categoria_rel'])->withCount($c['categoria_rel'])->orderBy('name')->get();
    }
}
