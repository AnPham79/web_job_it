<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<h1>Web tìm việc (~~ TOPDEV, TOPCV, ...)</h1>


- factory địa chỉ Việt Nam
- https://github.com/fzaninotto/Faker/blob/master/src/Faker/Provider/vi_VN/Address.php
- address: https://github.com/fzaninotto/Faker/tree/master?tab=readme-ov-file#fakerprovideren_usaddress.

- config->app 

    Đổi : 'faker_locale' => 'vi_VN' để factories địa chỉ theo id.

    - tải pagkage: composer require fzaninotto/faker (pagkage faker tỉnh thành);

- composer require bensampo/laravel-enum ( pagkage laravel enum )

- đăng nhập bằng socialite
- google.
- github.
- facebook.

- composer require laravel/socialite dowload pagkage laravel

 @đăng nhập bằng google
- viết route.

- vào config->service viết service.

- vào google -> search google developer console để thiết lập API.

- chọn Apis and services -> credentials -> create credentials -> oAuth client -> web application -> đặt tên xuống dưới Authorized redirect URLs -> http://127.0.0.1:8000/Auth/google/callback;

- coppy clinet ID bỏ vào client id service.

- coppy clinet ID bỏ vào client secret service.

@đăg nhập bằng github

- viết route.

- vào config->service viết service.

- vào git -> Developer setting -> chọn đăng kí OAuth.

