@extends('frontend.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>{{__('SL')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Phone')}}</th>
                            <th>{{__('Roles')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                    @forelse($user?->roles as $role)
                                        <button class="m-1 btn btn-sm btn-success">{{$role->name}}</button>
                                    @empty
                                        <p class="text-danger">No role assigned</p>
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('user.assign_role_to_user', $user->id)}}">
                                        <button class="btn btn-sm btn-primary">Assign/Update Role</button>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8"><p class="text-danger text-center">{{__('No Data found')}}</p></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $('.role_delete_button').on('click', function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will be logged out form admin panel",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, logout'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).parent('form').submit()
                    }
                })
            })
        </script>
    @endpush
@endsection



