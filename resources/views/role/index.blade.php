@extends('frontend.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    </a>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->created_at->toDayDateTimeString()}}</td>
                                <td>{{$role->created_at != $role->updated_at ? $role->updated_at->toDayDateTimeString(): __('Not updated yet')}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('role.edit', $role->id)}}">
                                            <button class="btn btn-sm btn-warning">
                                                <i class="ri-edit-box-line"></i>
                                            </button>
                                        </a>
                                        {!! Form::open(['method'=>'delete', 'route'=>['role.destroy', $role->id], 'id'=>'role_delete_button_'.$role->id]) !!}
                                        {!! Form::button('<i class="ri-delete-bin-line"></i>', ['class'=>'btn btn-danger ms-1 btn-sm role_delete_button', 'type'=>'button']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5"> <p class="text-danger text-center">{{__('No Data found')}}</p></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $('.role_delete_button').on('click', function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete this role!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).parent('form').submit()
                    }
                })
            })
        </script>
    @endpush

@endsection
