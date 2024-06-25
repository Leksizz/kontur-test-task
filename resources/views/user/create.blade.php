@extends('layouts/main')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container my-5">
        <h1 class="text-center my-5">Новый пользователь:</h1>
        <div class="mx-auto col-sm-9">
            <form action="" method="POST" id="createForm">
                @csrf
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="name" class="form-label"><strong>Имя:</strong></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Имя" required>
                        <p class="text-danger" id="errorName"></p>
                    </div>
                    <div class="col-md-12">
                        <label for="phone" class="form-label"><strong>Телефон:</strong></label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Телефон" required>
                        <p class="text-danger" id="errorPhone"></p>
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label"><strong>Электронная почта:</strong></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Электронная почта"
                               required>
                        <p class="text-danger" id="errorEmail"></p>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary mt-3">Отправить</button>
                <p class="text-success text-center" id="success"></p>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('createForm').addEventListener('submit', function (event) {
                event.preventDefault();

                const formData = new FormData(this);
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                let dataToSend = {};

                for (let [key, value] of formData.entries()) {
                    dataToSend[key] = value;
                }

                const jsonData = JSON.stringify(dataToSend);

                fetch("http://127.0.0.1:8000/api/v1/users/store", {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: jsonData,
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.errors) {
                            const errors = data.errors
                            if (errors.name) {
                                document.getElementById('errorName').innerHTML = errors.name
                            }
                            if (errors.phone) {
                                document.getElementById('errorPhone').innerHTML = errors.phone
                            }
                            if (errors.email) {
                                document.getElementById('errorEmail').innerHTML = errors.email
                            }
                        } else {
                            document.getElementById('success').innerHTML = data
                        }
                    })
            });
        });
    </script>
@endsection
