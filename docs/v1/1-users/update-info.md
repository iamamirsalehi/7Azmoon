# **Get List Of Users**

## PUT ``/api/v1/users``

**POST Params**:
- ``id`` : user id
- ``fullname`` : user fullname
- ``email`` :  user email
- ``mobile`` :  user mobile

<br><hr><br>


## ``JSON`` Response Format

``` json
{
    "success" : false ,   // boolean
    "message" : "",       // string
    "data" : {},          // updated user data
}
```