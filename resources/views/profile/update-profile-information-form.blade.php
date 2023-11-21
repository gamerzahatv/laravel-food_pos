
  <x-form-section submit="updateProfileInformation">
      <x-slot name="title">
          {{ __('อัปเดตโปรไฟล์') }}
      </x-slot>

      <x-slot name="description">
          {{ __('อัปเดตบัญชีของคุณ ข้อมูลและอีเมลล์') }}
      </x-slot>
      <x-slot name="form">

          <!-- Name -->
          <div class="col-span-6 sm:col-span-4">
              <x-label for="name" value="{{ __('ชื่อ') }}" />
              <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"
                  autocomplete="name" />
              <x-input-error for="name" class="mt-2" />
          </div>

          <!-- Email -->
          <div class="col-span-6 sm:col-span-4">
              <x-label for="email" value="{{ __('อีเมลล์') }}" />
              <x-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email"
                  autocomplete="username" />
              <x-input-error for="email" class="mt-2" />

              @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                      !$this->user->hasVerifiedEmail())
                  <p class="text-sm mt-2">
                      {{ __('Your email address is unverified.') }}

                      <button type="button"
                          class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                          wire:click.prevent="sendEmailVerification">
                          {{ __('Click here to re-send the verification email.') }}
                      </button>
                  </p>

                  @if ($this->verificationLinkSent)
                      <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                          {{ __('A new verification link has been sent to your email address.') }}
                      </p>
                  @endif
              @endif
              <br>
              <button type="button" class="btn btn-outline-primary">ที่อยู่ของฉัน</button>

          </div>
      </x-slot>

      <x-slot name="actions">
          <x-action-message class="mr-3" on="saved">
              {{ __('ข้อมูลของคุณอัปเดตแล้ว') }}
          </x-action-message>

          <x-button id="my-button" wire:loading.attr="disabled" wire:target="photo">
              {{ __('บันทึกข้อมูล') }}
          </x-button>
      </x-slot>
  </x-form-section>
