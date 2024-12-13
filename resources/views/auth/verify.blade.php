@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Подтвердите ваш адрес электронной почты') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('На ваш адрес электронной почты была отправлена новая ссылка для подтверждения.') }}
                            </div>
                        @endif

                        {{ __('Перед продолжением, пожалуйста, проверьте свою электронную почту для получения ссылки для подтверждения.') }}
                        {{ __('Если вы не получили письмо') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите здесь, чтобы запросить новое письмо') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
