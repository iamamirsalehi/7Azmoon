# **Create New User**

## POST ``/v1/users``

**POST Params**:
- ``fullname`` : user fullname
- ``email`` :  user email
- ``mobile`` :  user mobile (default null)
- ``password`` : user password

<br><hr><br>


## ``JSON`` Response Format

``` json
{
    "success" : false ,   // boolean
    "message" : "",       // string
    "data" : {},          // created user data
}
```