package application;

import metier.User;
import webService.UserManager.*;

import java.sql.Date;

public class test {
    public static void main(String[] args) {
        String nom="SOW";
        String prenom="DOCKO";
        String mail="docko@gmail.com";
        String mdp="docko";
        java.util.Date utilDate = new java.util.Date();
        Date date= new Date(utilDate.getTime());
        String sexe="M";

        User user1 = new User(prenom, nom, mail,mdp,sexe);

    }
}
