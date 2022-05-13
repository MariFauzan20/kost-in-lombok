@extends('layouts.layout')

@section('content')
  <div class="container mt-5">
		<div class="row">
            <div class="col">
                <h1>Edit Profile</h1>
                <form class="mt-5">
                    <div class="form-group mt-4">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Username">
                    </div>
                    <div class="form-group mt-4">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group mt-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary mt-5 me-3">Update</button>
                    <button type="cancel" class="btn btn-danger mt-5">Cancel</button>
                </form>
            </div>
        </div>
  </div>
@endsection

