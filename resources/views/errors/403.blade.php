@extends('errors::layout')

@section('title', __('Forbidden'))
@section('code', '403')
@section('header', 'Nananinanão!')
@section('message', __($exception->getMessage() ?: 'Você não tem permissão de acessar esse recurso (Forbidden)'))