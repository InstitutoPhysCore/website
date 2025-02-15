@extends('errors::layout')

@section('title', __('Não Autorizado'))
@section('code', '401')
@section('header', 'Ops!')
@section('message', __('Você não tem acesso a essa página!'))
