# **Get List Of Users**

## GET ``/v1/users``
**body** : none

**Query Params**:
- ``search`` : search keyword (search in user names & emails)
- ``page`` : page number
- ``pagesize`` : number of records in page (default:20)

<br><hr><br>


## ``HTML`` Response Format

``` html
<div class='user-list'>
    <div class='user-item'>
        <span class='avatar'></span>
        <span class='name'></span>
    </div>
</div>
```