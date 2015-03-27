package com.plussoluciones.cade.servicio;

import com.plussoluciones.cade.bean.Respuesta;
import com.plussoluciones.cade.bean.Ticket;
import com.plussoluciones.cade.dao.TicketDao;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;

/**
 *
 * @author EAlvarez
 */
@WebService(serviceName = "ticket")
public class TicketService {

    TicketDao ticketDao;

    public TicketService() {
        ticketDao = new TicketDao();
    }

    @WebMethod(operationName = "crearTicket")
    public String crearTicket(@WebParam(name = "idUsuario") int idUsuario, @WebParam(name = "idCategoria") int idCategoria, @WebParam(name = "asunto") String asunto, @WebParam(name = "mensaje") String mensaje) {
        try {
            return ticketDao.crearTicket(idUsuario, idCategoria, asunto, mensaje);
        } catch (SQLException ex) {
            Logger.getLogger(TicketService.class.getName()).log(Level.SEVERE, null, ex);
        }
        return null;
    }

    @WebMethod(operationName = "responderTicket")
    public String responderTicket(@WebParam(name = "mensaje") String mensaje, @WebParam(name = "idUsuario") int idUsuario, @WebParam(name = "idTicket") int idTicket) {
        try {
            return ticketDao.responderTicket(mensaje, idUsuario, idTicket);
        } catch (SQLException ex) {
            Logger.getLogger(TicketService.class.getName()).log(Level.SEVERE, null, ex);
        }
        return null;
    }

    @WebMethod(operationName = "cerrarTicket")
    public String cerrarTicket(@WebParam(name = "idTicket") int idTicket) {
        try {
            return ticketDao.cerrarTicket(idTicket);
        } catch (SQLException ex) {
            Logger.getLogger(TicketService.class.getName()).log(Level.SEVERE, null, ex);
        }
        return null;
    }
@WebMethod(operationName = "obtenerTicketPorId")
    public Ticket obtenerTicketPorId(@WebParam(name = "idTicket" ) int idTicket) {
        try {
            return ticketDao.obtenerTicketPorId(idTicket);
        } catch (SQLException ex) {
            Logger.getLogger(TicketService.class.getName()).log(Level.SEVERE, null, ex);
        }
        return null;
    }
    
    @WebMethod(operationName = "obtenerRespuestasPorIdTicket")
    public Respuesta obtenerRespuestasPorIdTicket(@WebParam(name = "idTicket" ) int idTicket) {
        try {
            return ticketDao.obtenerRespuestasPorIdTicket(idTicket);
        } catch (SQLException ex) {
            Logger.getLogger(TicketService.class.getName()).log(Level.SEVERE, null, ex);
        }
        return null;
    }
}
