@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="d-flex justify-content-center">
                <h3>Approval Management System</h3>
            </div>

            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $item->name }}</td>

                        @if ($item->status === 'pending' )
                        <td style="color: grey">Pending</td>
                        @elseif ( $item->status === 'approved' )
                        <td style="color: green">Approved</td>
                        @elseif ( $item->status === 'rejected' )
                        <td style="color: red">Rejected</td>
                        @endif

                        <td>
                            @if($item->status != 'approved')
                            <form action="/approval/{{$item->id}}" method="post">
                                @csrf
                                <input type="hidden" name="status" value="approved">
                                <button class="btn btn-success mb-2" onclick="return confirm('Confirm to approve?')">Approved</button>
                            </form>
                            @endif
                            @if($item->status != 'rejected')
                            <form action="/approval/{{$item->id}}" method="post">
                                @csrf
                                <input type="hidden" name="status" value="rejected">
                                <button class="btn btn-danger" onclick="return confirm('Confirm to reject?')">Rejected</button>
                            </form>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <p>Back to <a href="/"> homepage </a></p>

        </div>
    </div>
</div>
@endsection