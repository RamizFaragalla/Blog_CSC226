# Blog_CSC226
In this group project, we created a blog website using php and mysql. 

Features of the website:
  - login/register/logout
  - home page lets you read all the blogs that are in the database
  - my blogs page lets you read only your blogs
  - update/delete button lets you update any of your blogs
  - create button lets you create a new blog
    user can type the new blog or upload a txt file
  
  Our database had two tables:
    1. user: had userID (primary key), name, email, hashed password
    2. post: had postID (primary key), userID (foreign key), tite, content, date
