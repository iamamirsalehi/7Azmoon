# **Get List Of Categories**

## GET ``/api/v1/categories``

**GET Query Params**:
- ``search`` : search keyword (search-fields: slug|name)
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