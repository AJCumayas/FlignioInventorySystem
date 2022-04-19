@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                   <form action =  "{{route('register-user')}}" method = "POST">
                    @csrf
                    <div class="form-group">
                        <label for='employee_id'> </label>
                        <input type="text" class="form-control" placeholder="Enter Employee ID" name="employee_id" value="">
                        <span class="text-danger">
                            @error('employee_id'){{$message}}@enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for='company_name'> </label>
                        <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name" value="">
                        <span class="text-danger">
                            @error('company_name'){{$message}}@enderror
                        </span>
                    </div>
                   <div class="form-group">
                       <label for='last_name'> </label>
                       <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name" value="">
                       <span class="text-danger">
                        @error('last_name'){{$message}}@enderror
                    </span>
                    </div>
                    <div class="form-group">
                        <label for='first_name'> </label>
                        <input type="text" class="form-control" placeholder="Enter First Name" name="first_name" value="">
                        <span class="text-danger">
                         @error('first_name'){{$message}}@enderror
                     </span>
                     </div>

                     <div class="form-group">
                        <label for='middle_name'> </label>
                        <input type="text" class="form-control" placeholder="Enter Middle Name" name="middle_name" value="">
                        <span class="text-danger">
                         @error('middle_name'){{$message}}@enderror
                     </span>
                     </div>

                     <div class="form-group">
                        <label for='sufffix'> </label>
                        <input type="text" class="form-control" placeholder="Enter Suffix" name="suffix" value="">
                        <span class="text-danger">
                         @error('suffix'){{$message}}@enderror
                     </span>
                     </div>

                   <div class="form-group">
                        <label for='email'> </label>
                        <input type="email" class="form-control" placeholder="Enter Email Address" name="email" value="">
                        <span class="text-danger">
                            @error('email'){{$message}}@enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for='role_request'> </label>
                        <select class="form-control form-control-user @error('role_request') is-invalid @enderror" name="role_request">
                            <option selected disabled>Select Role Request</option>
                            @foreach ($roles as $role)
                            <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('role_request'){{$message}}@enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for='password'> </label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" value="">
                        <span class="text-danger">
                            @error('password'){{$message}}@enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for='confirm_password'> </label>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" value="">
                        <span class="text-danger">
                            @error('confirm_password'){{$message}}@enderror
                        </span>
                    </div>

                    {{-- <div class="form-group">
                        <label for='password-confirm'> </label>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="password-confirm" value="">
                        <span class="text-danger">
                            @error('password-confirm'){{$message}}@enderror
                        </span>
                    </div> --}}


                    <div class="form-group" style="margin-top: 10px">
                        <div class="col-md-2 offset-md-8">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                    <br>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
