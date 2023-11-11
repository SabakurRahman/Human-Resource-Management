@extends('frontend.layouts.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>SI</th>
                            <th>Notice Title </th>
                            <th>Notice Date </th>
                            <th>Action</th>



                        </tr>
                        </thead>

                        <tbody>
                        @forelse($notices as $notice)
                            <tr>
                                <th>{{ $loop->iteration  }}</th>
                                <td>{{$notice?->title}}</td>
                                <td>{{ $notice->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>
                                    <a href="{{route('notice.show', $notice->id)}}"
                                       class="btn btn-sm btn-primary">view</a>
                                </td>
                        @empty
                            <tr>
                                <td colspan="5"> <p class="text-danger text-center">{{__('No Notice found')}}</p></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>



@endsection
