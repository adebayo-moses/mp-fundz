@extends('layouts.app')

@section('title')
    <title>Bank Account | MP Fundz</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection

@section('main')

@include('includes.side_menu')


<section class="vid-title-sec mt-5">
    <div class="container">
        <div class="mb-2">
            <a href="{{route('user.account.add')}}" class="btn btn-primary btn-sm">Add Account</a>
        </div>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Account Name</th>
                <th scope="col">Account Number</th>
                <th scope="col">Bank Name</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($user_accounts as $user_account)
                    <tr>
                    <th scope="row">{{$user_account->id}}</th>
                    <td>{{$user_account->account_name}}</td>
                    <td>{{$user_account->account_number}}</td>
                    <td>{{$user_account->bank_name}}</td>
                    </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">
                        <p>You have not added an account yet</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
          </table>
    </div>
</section><!--vid-title-sec-->

@endsection
