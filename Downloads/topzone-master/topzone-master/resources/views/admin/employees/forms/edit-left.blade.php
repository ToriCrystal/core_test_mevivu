<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('Thông tin Nhân Viên') }}</h2>
        </div>
        <div class="row card-body">
            <!-- Username -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Username') }}:</label>
                    <x-input name="username" :value="$employees->username" :required="true"
                        placeholder="{{ __('Tên người dùng') }}" />
                </div>
            </div>
            <!-- Email Address -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Email') }}:</label>
                    <x-input-email name="email" :value="$employees->email" :required="true" />
                </div>
            </div>

            <!-- new password -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Mật khẩu') }}:</label>
                    <x-input-password name="password" />
                </div>
            </div>
            <!-- new password confirmation-->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Xác nhận mật khẩu') }}:</label>
                    <x-input-password name="password_confirmation"
                        data-parsley-equalto="input[name='password']"
                        data-parsley-equalto-message="{{ __('Mật khẩu không khớp.') }}" />
                </div>
            </div>
            <!-- Gender -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Giới tính') }}:</label>
                    <x-select name="gender" :required="true">
                        <x-option value="" :title="__('Chọn giới tinh')" />
                        @foreach ($gender as $key => $value)
                            <x-option :option="$employees->gender->value" :value="$key" :title="__($value)" />
                        @endforeach
                    </x-select>
                </div>
            </div>
            <!-- Role -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Roles') }}:</label>
                    <x-select name="roles" :required="true">
                        <x-option value="" :title="__('Chọn roles')" />
                        @foreach ($role as $key => $value)
                        <x-option :selected="$employees->roles == $key" :value="$key" :title="__($value)" />
                        @endforeach
                    </x-select>
                </div>
            </div>
        </div>
    </div>
</div>
