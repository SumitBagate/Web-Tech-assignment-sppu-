package com.assignment.action;

import com.opensymphony.xwork2.ActionSupport;
import com.assignment.model.User;

public class LoginAction extends ActionSupport {
    private User user = new User();

    public String execute() {
        return SUCCESS;
    }

    public void validate() {
        // name validation
        if (user.getName() == null || user.getName().trim().isEmpty()) {
            addFieldError("user.name", "Name is required.");
        } else if (!user.getName().matches("^[A-Za-z ]{2,50}$")) {
            addFieldError("user.name", "Enter a valid name (letters and spaces only).");
        }

        // mobile validation
        if (user.getMobile() == null || user.getMobile().trim().isEmpty()) {
            addFieldError("user.mobile", "Mobile number is required.");
        } else if (!user.getMobile().matches("^[0-9]{10}$")) {
            addFieldError("user.mobile", "Enter a valid 10-digit mobile number.");
        }

        // email validation
        if (user.getEmail() == null || user.getEmail().trim().isEmpty()) {
            addFieldError("user.email", "Email is required.");
        } else if (!user.getEmail().matches("^[\\w.-]+@[\\w.-]+\\.[A-Za-z]{2,6}$")) {
            addFieldError("user.email", "Enter a valid email address.");
        }
    }

    public User getUser() { return user; }
    public void setUser(User user) { this.user = user; }
}