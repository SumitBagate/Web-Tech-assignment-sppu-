<%@ taglib prefix="s" uri="/struts-tags" %>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Assignment 8 - Login</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background: #f4f6f8;
      }
      .card {
        max-width: 420px;
        margin: 60px auto;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
      }
      label {
        display: block;
        margin-top: 12px;
        font-weight: 600;
      }
      input[type="text"],
      input[type="email"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
      .error {
        color: #b90e0a;
        margin-top: 8px;
      }
      .btn {
        margin-top: 16px;
        padding: 10px 16px;
        background: #667eea;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <div class="card">
      <h2>Login - Assignment 8</h2>
      <s:form action="login" method="post">
        <s:fielderror />

        <label for="name">Name</label>
        <s:textfield name="user.name" id="name" />
        <s:fielderror fieldName="user.name"
          ><div class="error"><s:fielderror /></div
        ></s:fielderror>

        <label for="mobile">Mobile Number</label>
        <s:textfield name="user.mobile" id="mobile" />
        <s:fielderror fieldName="user.mobile"
          ><div class="error"><s:fielderror /></div
        ></s:fielderror>

        <label for="email">Email</label>
        <s:textfield name="user.email" id="email" />
        <s:fielderror fieldName="user.email"
          ><div class="error"><s:fielderror /></div
        ></s:fielderror>

        <s:submit cssClass="btn" value="Login" />
      </s:form>
    </div>
  </body>
</html>
