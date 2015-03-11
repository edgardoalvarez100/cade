/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.plussoluciones.cade.conexion;

import java.sql.Connection;
import java.sql.SQLException;
import javax.naming.Context;
import javax.naming.InitialContext;
import javax.naming.NamingException;
import javax.sql.DataSource;

/**
 *
 * @author EAlvarez
 */
public class ConexionOracle {

    public synchronized Connection conectar() throws Exception {
        String name = "jdbc/cade";
        Context ctx = null;
        DataSource ds = null;
        Connection conn = null;
        try {

            ctx = new InitialContext();
            ds = (DataSource) ctx.lookup(name);
            conn = ds.getConnection();
            // Devolvemos el nombre del Catalogo que accesamos
            return conn;

        } catch (SQLException | NamingException e) {
            throw new Exception("Error al localizar el DataSource, " + name + " no encontrado", e);
        }
    }

    public synchronized void desconectarBD(Connection con) throws SQLException {
        if (con != null) {
            con.close();
        }
    }

}
