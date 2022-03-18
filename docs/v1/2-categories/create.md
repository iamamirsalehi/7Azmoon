# **Create New Category**

## POST ``/api/v1/categories``

**POST Params**:
- ``id`` : category id
- ``name`` : category name (persian)
- ``slug`` :  slug (for use in urls, dash-seperated)

<br><hr><br>

## ``JSON`` Response Format

``` json
{
    "success" : false ,   // boolean
    "message" : "",       // string
    "data" : {},          // created category data
}
```