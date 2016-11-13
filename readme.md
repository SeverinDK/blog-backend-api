# Blogs

## GET /blogs

### Request Example

$ curl http://domain.tld/api/blogs/

### Response Example
```
200 OK
Content-Type:application/json;charset=UTF-8
[
  {"id":1,"name":"Blog","user_id":1,"created_at":"2016-11-13 21:27:31","updated_at":"2016-11-13 21:27:31","deleted_at":null},
  {"id":2,"name":"Blog","user_id":1,"created_at":"2016-11-13 21:42:17","updated_at":"2016-11-13 21:42:17","deleted_at":null}
]
```

---

## GET /blogs/1

### Request Example

$ curl http://domain.tld/api/blogs/1

### Response Example
```
200 OK
Content-Type:application/json;charset=UTF-8
{"id":1,"name":"Blog","user_id":1,"created_at":"2016-11-13 21:27:31","updated_at":"2016-11-13 21:27:31","deleted_at":null}
```

---

## GET /blogs/1/posts

### Request Example

$ curl http://domain.tld/api/blogs/1/posts

### Response Example
```
200 OK
Content-Type:application/json;charset=UTF-8
[{"id":1,"title":"Title","content":"Content","user_id":1,"created_at":"2016-11-13 21:28:12","updated_at":"2016-11-13 21:28:12","deleted_at":null,"blog_id":1}]
```

---

## POST /blogs

### Request Example

$ curl http://domain.tld/api/blogs -d '{"name": "NewBlog"}'

### Response Example
```
200 OK
Content-Type:application/json;charset=UTF-8
{"name":"NewBlog","user_id":1,"updated_at":"2016-11-13 22:07:49","created_at":"2016-11-13 22:07:49","id":3}
```

---

## POST /blogs/1/post

### Request Example

$ curl http://domain.tld/api/blogs/1/post -d '{"title": "PostTitle", "content": "PostContent"}'

### Response Example
```
200 OK
Content-Type:application/json;charset=UTF-8
{"title":"PostTitle","content":"PostContent","user_id":1,"blog_id":1,"updated_at":"2016-11-13 22:09:43","created_at":"2016-11-13 22:09:43","id":2}
```

---

## PATCH /blogs/1

### Request Example

$ curl http://domain.tld/api/blogs/1 -d '{"field": "name", "value": "EditedBlogName"}'

### Response Example
```
200 OK
Content-Type:application/json;charset=UTF-8
{"id":1,"name":"EditedBlogName","user_id":1,"created_at":"2016-11-13 21:27:31","updated_at":"2016-11-13 22:13:01","deleted_at":null}
```

---

## DELETE /blogs/1

### Request Example

$ curl http://domain.tld/api/blogs/1

### Response Example
```
200 OK
```

# Posts

## GET /posts

### Request Example

$ curl http://domain.tld/api/posts/

### Response Example
```
200 OK
Content-Type:application/json;charset=UTF-8
[
	{"id":1,"title":"PostTitle","content":"PostContent","user_id":1,"created_at":"2016-11-13 22:40:05","updated_at":"2016-11-13 22:40:05","deleted_at":null,"blog_id":1},
	{"id":1,"title":"PostTitle","content":"PostContent","user_id":1,"created_at":"2016-11-13 22:40:19","updated_at":"2016-11-13 22:40:19","deleted_at":null,"blog_id":1}
]
```

---

## GET /posts/1

### Request Example

$ curl http://domain.tld/api/posts/1

### Response Example
```
200 OK
Content-Type:application/json;charset=UTF-8
{"id":1,"title":"PostTitle","content":"PostContent","user_id":1,"created_at":"2016-11-13 22:40:05","updated_at":"2016-11-13 22:40:05","deleted_at":null,"blog_id":1}
```

---

## GET /posts/1/comments

### Request Example

$ curl http://domain.tld/api/posts/1/comments

### Response Example
```
200 OK
Content-Type:application/json;charset=UTF-8
[
	{"id":1,"content":"Comment","commentable_id":1,"commentable_type":"App\\Post\\Post","user_id":1,"created_at":"2016-11-13 22:45:17","updated_at":"2016-11-13 22:45:17","deleted_at":null},
	{"id":2,"content":"Comment","commentable_id":1,"commentable_type":"App\\Post\\Post","user_id":1,"created_at":"2016-11-13 22:45:18","updated_at":"2016-11-13 22:45:18","deleted_at":null}
]
```

---

## POST /posts/1/comment

### Request Example

$ curl http://domain.tld/api/posts/1/comment -d '{"content": "Comment"}'

### Response Example
```
200 OK
Content-Type:application/json;charset=UTF-8
{"id":3,"content":"Comment","commentable_id":1,"commentable_type":"App\\Post\\Post","user_id":1,"created_at":"2016-11-13 22:45:17","updated_at":"2016-11-13 22:45:47","deleted_at":null}
```

---

## PATCH /posts/1

### Request Example

$ curl http://domain.tld/api/posts/1 -d '{"field": "title", "value": "EditedPostTitle"}'

### Response Example
```
200 OK
Content-Type:application/json;charset=UTF-8
{"id":1,"title":"EditedPostTitle","content":"PostContent","user_id":1,"created_at":"2016-11-13 22:40:05","updated_at":"2016-11-13 22:49:31","deleted_at":null,"blog_id":1}
```

---

## DELETE /blogs/1

### Request Example

$ curl http://domain.tld/api/posts/1

### Response Example
```
200 OK
```

# Comments

## GET /comments

### Request Example

$ curl http://domain.tld/api/comments/

### Response Example
```
200 OK
Content-Type:application/json;charset=UTF-8
[
	{"id":1,"content":"Comment","commentable_id":1,"commentable_type":"App\\Post\\Post","user_id":1,"created_at":"2016-11-13 22:45:17","updated_at":"2016-11-13 22:45:17","deleted_at":null},
	{"id":2,"content":"Comment","commentable_id":1,"commentable_type":"App\\Post\\Post","user_id":1,"created_at":"2016-11-13 22:45:18","updated_at":"2016-11-13 22:45:18","deleted_at":null}
]
```

---

## GET /comments/1

### Request Example

$ curl http://domain.tld/api/comments/1

### Response Example
```
200 OK
Content-Type:application/json;charset=UTF-8
{"id":1,"content":"Comment","commentable_id":1,"commentable_type":"App\\Post\\Post","user_id":1,"created_at":"2016-11-13 22:45:17","updated_at":"2016-11-13 22:45:17","deleted_at":null}
```

---

## GET /comments/1/comments

### Request Example

$ curl http://domain.tld/api/comments/1/comments

### Response Example
```
200 OK
Content-Type:application/json;charset=UTF-8
[
	{"id":1,"content":"Comment","commentable_id":1,"commentable_type":"App\\Post\\Post","user_id":1,"created_at":"2016-11-13 22:45:17","updated_at":"2016-11-13 22:45:17","deleted_at":null},
	{"id":2,"content":"Comment","commentable_id":1,"commentable_type":"App\\Post\\Post","user_id":1,"created_at":"2016-11-13 22:45:18","updated_at":"2016-11-13 22:45:18","deleted_at":null}
]
```

---

## POST /comments/1/comment

### Request Example

$ curl http://domain.tld/api/comments/1/comment -d '{"content": "Reply"}'

### Response Example
```
200 OK
Content-Type:application/json;charset=UTF-8
{"content":"Reply","user_id":1,"commentable_id":1,"commentable_type":"App\\Comment\\Comment","updated_at":"2016-11-13 22:53:07","created_at":"2016-11-13 22:53:07","id":3}
```

---

## PATCH /comments/1

### Request Example

$ curl http://domain.tld/api/comments/1 -d '{"field": "content", "value": "EditedComment"}'

### Response Example
```
200 OK
Content-Type:application/json;charset=UTF-8
{"id":1,"content":"EditedComment","commentable_id":1,"commentable_type":"App\\Post\\Post","user_id":1,"created_at":"2016-11-13 22:45:17","updated_at":"2016-11-13 22:54:17","deleted_at":null}
```

---

## DELETE /comments/1

### Request Example

$ curl http://domain.tld/api/comments/1

### Response Example
```
200 OK
```
