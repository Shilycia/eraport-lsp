<x-layout>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="session">
        <div class="left">
            <img src="{{ asset('assets/images/smkn1cibinong.png') }}" alt="SMKN 1 Cibinong Logo">
        </div>
        <form action="" method="POST" class="log-in" autocomplete="off">
            @csrf
            <input type="hidden" id="user_type" name="user_type" value="student">
            <h4>LOG IN</h4>
            <input type="text" placeholder="NIS" name="user_type" value="murid" id="user_type_input" autocomplete="off">
            <div class="switch">
                <a href="#student" class="switch-active">Student</a>
                <a href="#teacher" class="switch-inactive">Teacher</a>
                <div class="switch-indicator"></div>
            </div>

            <div id="students">
                <div class="floating-label">
                    <input type="text" placeholder="NIS" name="nis" id="nis" autocomplete="off">
                    <label for="nis">NIS:</label>
                    <div class="icon profile-icon">
                        <svg class="svg" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="none"/>
                            <path fill="#010101" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-4.41 0-8 3.59-8 8v2h16v-2c0-4.41-3.59-8-8-8z"/>
                        </svg>
                    </div>
                </div>
                <div class="floating-label">
                    <input placeholder="Password" type="password" name="student_password" id="student_password" autocomplete="off">
                    <label for="student_password">Password:</label>
                    <div class="icon">
                        <svg class="svg" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="none"/>
                            <path fill="#010101" d="M19 21H5V9h14v12z M6 20h12V10H6v10z"/>
                            <path fill="#010101" d="M16.5 10h-1V7c0-1.9-1.6-3.5-3.5-3.5S8.5 5.1 8.5 7v3h-1V7c0-2.5 2-4.5 4.5-4.5S16.5 4.5 16.5 7V10z"/>
                            <path fill="#010101" d="M12 16.5c-0.8 0-1.5-0.7-1.5-1.5s0.7-1.5 1.5-1.5 1.5 0.7 1.5 1.5-0.7 1.5-1.5 1.5z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div id="teacher" style="display:none;">
                <div class="floating-label">
                    <input placeholder="NIG" type="text" name="nip" id="nig" autocomplete="off">
                    <label for="nip">NIG:</label>
                    <div class="icon profile-icon">
                        <svg class="svg" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="none"/>
                            <path fill="#010101" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-4.41 0-8 3.59-8 8v2h16v-2c0-4.41-3.59-8-8-8z"/>
                        </svg>
                    </div>
                </div>
                <div class="floating-label">
                    <input placeholder="Password" type="password" name="teacher_password" id="teacher_password" autocomplete="off">
                    <label for="teacher_password">Password:</label>
                    <div class="icon">
                        <svg class="svg" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="none"/>
                            <path fill="#010101" d="M19 21H5V9h14v12z M6 20h12V10H6v10z"/>
                            <path fill="#010101" d="M16.5 10h-1V7c0-1.9-1.6-3.5-3.5-3.5S8.5 5.1 8.5 7v3h-1V7c0-2.5 2-4.5 4.5-4.5S16.5 4.5 16.5 7V10z"/>
                            <path fill="#010101" d="M12 16.5c-0.8 0-1.5-0.7-1.5-1.5s0.7-1.5 1.5-1.5 1.5 0.7 1.5 1.5-0.7 1.5-1.5 1.5z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <button type="submit">Log in</button>
        </form>
    </div>
</x-layout>
