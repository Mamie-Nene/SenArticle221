package webService;

public class UserManagerProxy implements webService.UserManager {
  private String _endpoint = null;
  private webService.UserManager userManager = null;
  
  public UserManagerProxy() {
    _initUserManagerProxy();
  }
  
  public UserManagerProxy(String endpoint) {
    _endpoint = endpoint;
    _initUserManagerProxy();
  }
  
  private void _initUserManagerProxy() {
    try {
      userManager = (new webService.UserWebserviceLocator()).getUserManagerPort();
      if (userManager != null) {
        if (_endpoint != null)
          ((javax.xml.rpc.Stub)userManager)._setProperty("javax.xml.rpc.service.endpoint.address", _endpoint);
        else
          _endpoint = (String)((javax.xml.rpc.Stub)userManager)._getProperty("javax.xml.rpc.service.endpoint.address");
      }
      
    }
    catch (javax.xml.rpc.ServiceException serviceException) {}
  }
  
  public String getEndpoint() {
    return _endpoint;
  }
  
  public void setEndpoint(String endpoint) {
    _endpoint = endpoint;
    if (userManager != null)
      ((javax.xml.rpc.Stub)userManager)._setProperty("javax.xml.rpc.service.endpoint.address", _endpoint);
    
  }
  
  public webService.UserManager getUserManager() {
    if (userManager == null)
      _initUserManagerProxy();
    return userManager;
  }
  
  public int addingUser(webService.User user) throws java.rmi.RemoteException{
    if (userManager == null)
      _initUserManagerProxy();
    return userManager.addingUser(user);
  }
  
  public int updateUser(java.lang.String mail, webService.User user) throws java.rmi.RemoteException{
    if (userManager == null)
      _initUserManagerProxy();
    return userManager.updateUser(mail, user);
  }
  
  public webService.User[] listUser() throws java.rmi.RemoteException{
    if (userManager == null)
      _initUserManagerProxy();
    return userManager.listUser();
  }
  
  public int deleteUser(java.lang.String mail) throws java.rmi.RemoteException{
    if (userManager == null)
      _initUserManagerProxy();
    return userManager.deleteUser(mail);
  }
  
  public int login(java.lang.String mail, java.lang.String password) throws java.rmi.RemoteException{
    if (userManager == null)
      _initUserManagerProxy();
    return userManager.login(mail, password);
  }
  
  
}