<%@ taglib prefix="s" uri="/struts-tags" %>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Welcome</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background: #f4f6f8;
      }
      .card {
        max-width: 600px;
        margin: 60px auto;
        background: white;
        padding: 24px;
        border-radius: 8px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
      }
    </style>
  </head>
  <body>
    <div class="card">
      <h1>Congratulations, <s:property value="user.name" />!</h1>
      <p>Welcome to the assignment demo.</p>
      <p>
        <strong>Mobile:</strong> <s:property value="user.mobile" /> |
        <strong>Email:</strong> <s:property value="user.email" />
      </p>
    </div>
  </body>
</html>
