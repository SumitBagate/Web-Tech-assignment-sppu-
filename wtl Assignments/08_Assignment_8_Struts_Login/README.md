Assignment 8 - Struts2 Login Demo

Files created:

- pom.xml
- src/main/webapp/login.jsp
- src/main/webapp/welcome.jsp
- src/main/webapp/WEB-INF/web.xml
- src/main/resources/struts.xml
- src/main/java/com/assignment/action/LoginAction.java
- src/main/java/com/assignment/model/User.java

Prerequisites:

- JDK 8+ installed and `JAVA_HOME` set
- Maven installed and on PATH

Run locally (development using Jetty plugin):

1. Open terminal in project root:

```bash
cd "c:\Users\sumit\Desktop\wtl Assignments\08_Assignment_8_Struts_Login"
mvn clean package
mvn jetty:run
```

2. Open browser:

```
http://localhost:8080/login.jsp
```

Notes:

- You can also build the WAR and deploy to Tomcat: `mvn package` then copy target/assignment8-struts-login.war to Tomcat's `webapps` directory.
- Validation performed server-side in `LoginAction.validate()`; invalid fields re-display the login page with messages.

If you want, I can run `mvn -q -DskipTests package` here, but your environment must have Java and Maven installed to run the app locally.
