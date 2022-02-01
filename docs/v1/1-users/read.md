# **Get List Of Users**

## GET ``/api/v1/users``

**GET Query Params**:
- ``search`` : search keyword (search-fields: fullnames|emails|mobiles)
- ``page`` : page number
- ``pagesize`` : number of records in page (default:20)

<br><hr><br>


## ``JSON`` Response Format

``` json
{
    "success" : false ,   // boolean
    "message" : "",       // string
    "data" : {},          // array of records
}
```