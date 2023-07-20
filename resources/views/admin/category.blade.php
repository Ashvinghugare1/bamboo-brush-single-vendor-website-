@extends('admin.home')
@section('body')
        <div class="main-panel">
            <div class="content-wrapper">
              @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('message')}}
              </div>
              @endif
                <div class="row">
                    <h2>Add Category</h2>
                    <div class="col-4 grid-margin stretch-card mt-5 align-items-center">
                      <div class="card">
                        <div class="card-body">
                          <form class="forms-sample" method="POST" action="{{route('add-category')}}">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputName1">Add Category</label>
                              <input type="text" name="category" class="form-control" id="exampleInputName1" placeholder="category">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-dark">Cancel</button>
                          </form>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Sr No</th>
                                <th>Category</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @isset($data)
                            @foreach ($data as $key => $data)
                              <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{$data->category_name}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->updated_at}}</td>
                                <td><label class="badge badge-danger">Pending</label></td>
                                <td><a onclick="return confirm('are you sure to deletethis')" class="btn btn-danger" href="{{ route('delete-category', $data->id) }}">Delete</a>
                              </td>
                              </tr>
                              @endforeach
                              @endif
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            

    
@endsection