# **Get List Of Users**

## PUT ``/api/v1/users/change-password``

**POST Params**:
- ``id`` : user id
- ``password`` : user password
- ``password_reapet`` : password reapet 

<br><hr><br>


## ``JSON`` Response Format

``` json
{
    "success" : false ,   // boolean
    "message" : "",       // string
    "data" : {},          // updated user data
}
```