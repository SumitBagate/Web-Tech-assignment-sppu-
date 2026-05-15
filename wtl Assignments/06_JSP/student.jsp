<%@ page import="java.sql.*" %>

<html>
<head>
<title>Student Information</title>
</head>

<body>

<h2>Student Information</h2>

<table border="1">
<tr>
<th>ID</th>
<th>Name</th>
<th>Class</th>
<th>Division</th>
<th>City</th>
</tr>

<%
try{

Class.forName("com.mysql.cj.jdbc.Driver");

Connection con = DriverManager.getConnection(
"jdbc:mysql://localhost:3306/college","root","password");

Statement stmt = con.createStatement();
ResultSet rs = stmt.executeQuery("SELECT * FROM students_info");

while(rs.next()){
%>

<tr>
<td><%=rs.getInt("stud_id")%></td>
<td><%=rs.getString("stud_name")%></td>
<td><%=rs.getString("class")%></td>
<td><%=rs.getString("division")%></td>
<td><%=rs.getString("city")%></td>
</tr>

<%
}
con.close();
}
catch(Exception e){
out.println(e);
}
%>

</table>

</body>
</html>