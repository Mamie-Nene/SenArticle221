/**
 * UserWebserviceLocator.java
 *
 * This file was auto-generated from WSDL
 * by the Apache Axis 1.4 Apr 22, 2006 (06:55:48 PDT) WSDL2Java emitter.
 */

package webService;

public class UserWebserviceLocator extends org.apache.axis.client.Service implements webService.UserWebservice {

    public UserWebserviceLocator() {
    }


    public UserWebserviceLocator(org.apache.axis.EngineConfiguration config) {
        super(config);
    }

    public UserWebserviceLocator(java.lang.String wsdlLoc, javax.xml.namespace.QName sName) throws javax.xml.rpc.ServiceException {
        super(wsdlLoc, sName);
    }

    // Use to get a proxy class for UserManagerPort
    private java.lang.String UserManagerPort_address = "http://localhost:5000/";

    public java.lang.String getUserManagerPortAddress() {
        return UserManagerPort_address;
    }

    // The WSDD service name defaults to the port name.
    private java.lang.String UserManagerPortWSDDServiceName = "UserManagerPort";

    public java.lang.String getUserManagerPortWSDDServiceName() {
        return UserManagerPortWSDDServiceName;
    }

    public void setUserManagerPortWSDDServiceName(java.lang.String name) {
        UserManagerPortWSDDServiceName = name;
    }

    public webService.UserManager getUserManagerPort() throws javax.xml.rpc.ServiceException {
       java.net.URL endpoint;
        try {
            endpoint = new java.net.URL(UserManagerPort_address);
        }
        catch (java.net.MalformedURLException e) {
            throw new javax.xml.rpc.ServiceException(e);
        }
        return getUserManagerPort(endpoint);
    }

    public webService.UserManager getUserManagerPort(java.net.URL portAddress) throws javax.xml.rpc.ServiceException {
        try {
            webService.UserManagerPortBindingStub _stub = new webService.UserManagerPortBindingStub(portAddress, this);
            _stub.setPortName(getUserManagerPortWSDDServiceName());
            return _stub;
        }
        catch (org.apache.axis.AxisFault e) {
            return null;
        }
    }

    public void setUserManagerPortEndpointAddress(java.lang.String address) {
        UserManagerPort_address = address;
    }

    /**
     * For the given interface, get the stub implementation.
     * If this service has no port for the given interface,
     * then ServiceException is thrown.
     */
    public java.rmi.Remote getPort(Class serviceEndpointInterface) throws javax.xml.rpc.ServiceException {
        try {
            if (webService.UserManager.class.isAssignableFrom(serviceEndpointInterface)) {
                webService.UserManagerPortBindingStub _stub = new webService.UserManagerPortBindingStub(new java.net.URL(UserManagerPort_address), this);
                _stub.setPortName(getUserManagerPortWSDDServiceName());
                return _stub;
            }
        }
        catch (java.lang.Throwable t) {
            throw new javax.xml.rpc.ServiceException(t);
        }
        throw new javax.xml.rpc.ServiceException("There is no stub implementation for the interface:  " + (serviceEndpointInterface == null ? "null" : serviceEndpointInterface.getName()));
    }

    /**
     * For the given interface, get the stub implementation.
     * If this service has no port for the given interface,
     * then ServiceException is thrown.
     */
    public java.rmi.Remote getPort(javax.xml.namespace.QName portName, Class serviceEndpointInterface) throws javax.xml.rpc.ServiceException {
        if (portName == null) {
            return getPort(serviceEndpointInterface);
        }
        java.lang.String inputPortName = portName.getLocalPart();
        if ("UserManagerPort".equals(inputPortName)) {
            return getUserManagerPort();
        }
        else  {
            java.rmi.Remote _stub = getPort(serviceEndpointInterface);
            ((org.apache.axis.client.Stub) _stub).setPortName(portName);
            return _stub;
        }
    }

    public javax.xml.namespace.QName getServiceName() {
        return new javax.xml.namespace.QName("http://webService/", "userWebservice");
    }

    private java.util.HashSet ports = null;

    public java.util.Iterator getPorts() {
        if (ports == null) {
            ports = new java.util.HashSet();
            ports.add(new javax.xml.namespace.QName("http://webService/", "UserManagerPort"));
        }
        return ports.iterator();
    }

    /**
    * Set the endpoint address for the specified port name.
    */
    public void setEndpointAddress(java.lang.String portName, java.lang.String address) throws javax.xml.rpc.ServiceException {
        
if ("UserManagerPort".equals(portName)) {
            setUserManagerPortEndpointAddress(address);
        }
        else 
{ // Unknown Port Name
            throw new javax.xml.rpc.ServiceException(" Cannot set Endpoint Address for Unknown Port" + portName);
        }
    }

    /**
    * Set the endpoint address for the specified port name.
    */
    public void setEndpointAddress(javax.xml.namespace.QName portName, java.lang.String address) throws javax.xml.rpc.ServiceException {
        setEndpointAddress(portName.getLocalPart(), address);
    }

}
