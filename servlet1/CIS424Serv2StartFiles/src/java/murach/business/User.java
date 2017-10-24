package murach.business;

import java.io.Serializable;

public class User implements Serializable {

    private String firstName;
    private String lastName;
    private String email;
    private int age;
    private String city;
    private String state;
    private String ageClass;

    public User() {
        firstName = "";
        lastName = "";
        email = "";
        age = 0;
        city = "";
        state = "";
        setAgeClass();
        
    }

    public User(String firstName, String lastName, String email, int age, String city, String state) {
        this.firstName = firstName;
        this.lastName = lastName;
        this.email = email;
        this.age = age;
        this.city = city;
        this.state = state;
        setAgeClass();
    }

    public String getFirstName() {
        return firstName;
    }

    public void setFirstName(String firstName) {
        this.firstName = firstName;
    }

    public String getLastName() {
        return lastName;
    }

    public void setLastName(String lastName) {
        this.lastName = lastName;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }
    
    public int getAge(){
        return age;
    }
    
    public void setAge(int age){
        this.age = age;
    }
    
    public String getCity(){
        return city;
    }
    
    public void setCity(String city){
        this.city = city;
    }
    public String getState(){
        return state;
    }
    
    public void setState(String state){
        this.state = state;
    }
    public String getAgeClass(){
        return ageClass;
    }
    public void setAgeClass(){
        if(age < 45){
            ageClass = "Under 45";
        } else if (age > 65){
            ageClass = "Over 65";
        } else if (age>45 && age<65){
            ageClass = "Between 45 and 65";
        }
    }
}