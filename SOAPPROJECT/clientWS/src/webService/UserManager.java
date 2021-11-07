/**
 * UserManager.java
 *
 * This file was auto-generated from WSDL
 * by the Apache Axis 1.4 Apr 22, 2006 (06:55:48 PDT) WSDL2Java emitter.
 */

package webService;

public interface UserManager extends java.rmi.Remote {
    public int addingUser(webService.User user) throws java.rmi.RemoteException;
    public int updateUser(java.lang.String mail, webService.User user) throws java.rmi.RemoteException;
    public webService.User[] listUser() throws java.rmi.RemoteException;
    public int deleteUser(java.lang.String mail) throws java.rmi.RemoteException;
    public int login(java.lang.String mail, java.lang.String password) throws java.rmi.RemoteException;
}
