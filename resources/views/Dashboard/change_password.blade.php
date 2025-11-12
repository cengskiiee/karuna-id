<x-dashboard.layout>
    @section('title')
    {{ $title }}
    @endsection

    <div class="row">
        <div class="col-lg-6">
            @if(session('success'))
                <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif
            <div class="card">
                <h5 class="card-header mt-0 font-size-16">Change Password</h5>
                <div class="card-body">
                    <form class="row needs-validation" action="{{ route('password.update') }}" method="POST" novalidate>
                        @csrf
                        <div class="mb-3 position-relative">
                            <label class="form-label" for="current_password">Current Password</label>
                            <div class="input-group">
                                <input type="password" maxlength="30" id="current_password" name="current_password" class="form-control" placeholder="Current Password" required />
                                <span class="input-group-text">
                                    <i id="togglePassword" class="fas fa-eye-slash"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3 position-relative">
                            <label class="form-label" for="new_password">New Password</label>
                            <div class="input-group">
                                <input type="password" maxlength="30" id="new_password" name="new_password" class="form-control" placeholder="The new password must be at least 8 characters" required />
                                <span class="input-group-text">
                                    <i id="togglePasswordNew" class="fas fa-eye-slash"></i>
                                </span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div></div>
                                <small id="new_password_char_count" class="char-count form-text d-none">0/30</small>
                            </div>
                            
                            <label class="form-label" for="new_password_confirmation">Re-Type Password</label>
                            <div class="input-group">
                                <input type="password" maxlength="30" id="new_password_confirmation" name="new_password_confirmation" class="form-control" placeholder="Re-Type New Password" required />
                                <span class="input-group-text">
                                    <i id="togglePasswordReNew" class="fas fa-eye-slash"></i>
                                </span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div></div>
                                <small id="new_password_confirmation_char_count" class="char-count form-text d-none">0/30</small>
                            </div>
                        </div>
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
    </div>

    

</x-dashboard.layout>

