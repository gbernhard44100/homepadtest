<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>API Documentation : HomePadTest</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .flex-left {
                align-items: center;
                display: flex;
                justify-content: left;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: left;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center">
            <div class="content">
                <div class="title m-b-md">
                    API Documentation for HomePadTest
                </div>

                <div class="list-group">
                    <li class="flex-left list-group-item list-group-item-primary">
                        <div class="container-fluid">
                            <div class="row">
                                <h1>User Requests</h1>
                            </div>
                            <hr>
                            <div class="row">
                                <h2>POST: "/api/users"</h2>
                            </div>
                            <div class="row">
                                <h4>Description: Register a new user</h4>
                                <table class="table thead-light">
                                    <tbody class="thead-light">
                                        <tr class="thead-light">
                                            <th scope="row">Headers</th>
                                            <td>Content-Type: application/json</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Parameter(s)</th>
                                            <td>
                                                <ul>
                                                    <li>name: The name of the new user | Type: string</li>
                                                    <li>email: The email of the new user | Type: email</li>
                                                    <li>password: The password of the new user | Type: string of minimum 8 characters</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Possible Response(s)</th>
                                            <td>
                                                <ul>
                                                    <li>code Status: 201</li>
                                                    <li>Content-Type: application/json</li>
                                                    <li>Body: The name and the email of the user</li>
                                                    <li>Meaning: The user has been well registered</li>
                                                </ul>
                                                <hr>
                                                <ul>
                                                    <li>code Status: 422</li>
                                                    <li>Content-Type: application/json</li>
                                                    <li>Body: The list of errors made in the body request</li>
                                                    <li>Meaning: Could not register because the information required were not provided</li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            <div>
                        </div>
                    </li>
                    <li class="list-group-item list-group-item-secondary">
                        <div class="container-fluid">
                            <div class="row">
                                <h1>Oauth Login</h1>
                            </div>
                            <hr>
                            <div class="row">
                                <h2>POST: "/api/login"</h2>
                            </div>
                            <div class="row">
                                <h4>Description: Login via OauthPassport to get an access token</h4>
                                <table class="table thead-light">
                                    <tbody class="thead-light">
                                        <tr class="thead-light">
                                            <th scope="row">Headers</th>
                                            <td>Content-Type: application/json</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Parameter(s)</th>
                                            <td>
                                                <ul>
                                                    <li>email: The email of the user to login | Type: email</li>
                                                    <li>password: The user password | Type: string</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Possible Response(s)</th>
                                            <td>
                                                <ul>
                                                    <li>code Status: 200</li>
                                                    <li>Content-Type: application/json</li>
                                                    <li>Body: The name and the access token</li>
                                                    <li>Meaning: The authentication succeeded and a token has been provided for a limited time access</li>
                                                </ul>
                                                <hr>
                                                <ul>
                                                    <li>code Status: 401</li>
                                                    <li>Content-Type: application/json</li>
                                                    <li>Body: notification that the credentials were wrong</li>
                                                    <li>Meaning: Wrong email or password</li>
                                                </ul>
                                                <hr>
                                                <ul>
                                                    <li>code Status: 422</li>
                                                    <li>Content-Type: application/json</li>
                                                    <li>Body: The list of errors made in the body request</li>
                                                    <li>Meaning: Could not login because the information required were not provided</li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            <div>
                            <hr>
                            <div class="row">
                                <h2>GET: "/api/login"</h2>
                            </div>
                            <div class="row">
                                <h4>Description: this route is used when a user need to login because the access token is invalid</h4>
                                <table class="table thead-light">
                                    <tbody class="thead-light">
                                        <tr>
                                            <th scope="row">Possible Response(s)</th>
                                            <td>
                                                <ul>
                                                    <li>code Status: 401</li>
                                                    <li>Content-Type: application/json</li>
                                                    <li>Body: Notification that the user need to login</li>
                                                    <li>Meaning: The user need to login</li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            <div>
                        </div>
                    </li>
                    <li class="list-group-item list-group-item-success">
                        <div class="container-fluid">
                            <div class="row">
                                <h1>Package Requests</h1>
                            </div>
                            <hr>
                            <div class="row">
                                <h2>GET: "/api/packages"</h2>
                            </div>
                            <div class="row">
                                <h4>Description: Get the list of all packages</h4>
                                <table class="table thead-light">
                                    <tbody class="thead-light">
                                        <tr class="thead-light">
                                            <th scope="row">Headers</th>
                                            <td>
                                                <ul>
                                                    <li>Content-Type: application/json</li>
                                                    <li>Bearer Token: The token obtained after login | Type: string</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Parameter(s)</th>
                                            <td>
                                                <p>No parameters needed</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Possible Response(s)</th>
                                            <td>
                                                <ul>
                                                    <li>code Status: 200</li>
                                                    <li>Content-Type: application/json</li>
                                                    <li>Body: The list of the packages with the id (int), name (string), limit of registration for the package (int) and if the package is available (boolean)</li>
                                                    <li>Meaning: The user has the access to the list of packages</li>
                                                </ul>
                                                <hr>
                                                <ul>
                                                    <li>code Status: 401</li>
                                                    <li>Content-Type: application/json</li>
                                                    <li>Body: message that the user is unauthenticated</li>
                                                    <li>Meaning: The user need to login to acces the list</li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            <div>
                        </div>
                    </li>
                </div>
            </div>
        </div>
    </body>
</html>
