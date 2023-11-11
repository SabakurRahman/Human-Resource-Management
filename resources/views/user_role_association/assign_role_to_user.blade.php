@extends('frontend.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{$user->phone}}</td>
                                </tr>
                                </thead>
                            </table>
                            <div class="roles">
                                <h5 class="text-theme py-3">Assigned Role</h5>
                                @forelse($user?->roles as $role)
                                    <button class="btn btn-success">{{$role->name}}</button>
                                @empty
                                    <p class="text-danger text-center">{{__('No Role Assigned')}}</p>
                                @endforelse
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-theme py-3">Assign Role to {{$user->name}}</h5>
                            {!! Form::open(['method'=>'put', 'route'=>['user.assign_role_to_user_sync', $user->id]]) !!}
                            @forelse($roles as $role)
                                <div class="form-check">
                                    {!! Form::checkbox('role_id[]', $role->id, in_array($role->id, $user_assigned_role_id_list, true), ['id'=>'role_id_'.$role->id,'class'=>'form-check-input']) !!}
                                    {!! Form::label('role_id_'.$role->id, $role->name, ['class'=>'form-check-label m-0']) !!}
                                </div>
                            @empty
                                <p class="text-danger text-center">{{__('No Role Found')}}</p>
                                <a href="{{route('role.create')}}">
                                    <button type="button" class="btn btn-success btn-sm">Please create role</button>
                                </a>
                            @endforelse
                            @if(count($roles) > 0)
                               {!! Form::button('<i class="ri-refresh-line"></i> Update', ['id' => 'role_update_button', 'class' => 'btn btn-primary mt-3 btn-sm custom-button', 'type' => 'button']) !!}
                            @endif

                            {!! Form::close([]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $('#role_update_button').on('click', function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "{{$user->name . 'will be assigned those roles'}}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Assign'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).parent('form').submit()
                    }
                })
            })
        </script>
    @endpush
@endsection
