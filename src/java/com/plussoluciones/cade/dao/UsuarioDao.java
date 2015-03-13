package com.plussoluciones.cade.dao;

import com.plussoluciones.cade.bean.Categoria;
import com.plussoluciones.cade.bean.Usuario;
import com.plussoluciones.cade.conexion.ConexionOracle;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;

import oracle.jdbc.OracleTypes;
import oracle.jdbc.OracleCallableStatement;

/**
 *
 * @author EAlvarez
 */
public class UsuarioDao extends ConexionOracle {

    Connection conexion;

    public Usuario loguear(String correo, String password) throws SQLException {
        Usuario usuario = new Usuario();
        String sql = "SELECT * FROM usuarios u INNER JOIN tipousuario t ON u.idtipo=t.idtipo "
                + "WHERE correo =? AND password =? AND ACTIVO=1";
        PreparedStatement ps = null;
        ResultSet rs = null;
        try {
            conexion = conectar();
            ps = conexion.prepareStatement(sql);
            ps.setString(1, correo);
            ps.setString(2, password);
            rs = ps.executeQuery();

            while (rs.next()) {
                usuario.setId(rs.getInt("idusuario"));
                usuario.setNombre(rs.getString("nombre"));
                usuario.setApellidos(rs.getString("apellidos"));
                usuario.setCedula(rs.getString("cedula"));
                usuario.setTelefono(rs.getString("telefono"));
                usuario.setTipo(rs.getString("tipousuario"));
                usuario.setCiudad(rs.getString("ciudad"));
                usuario.setCorreo(rs.getString("correo"));
            }

            return usuario;

        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            if (ps != null) {
                ps.close();
            }
            if (rs != null) {
                rs.close();
            }
            conexion.close();
        }
        return null;

    }

    public String registrar(Usuario usuario) throws SQLException {

        String sql = "{call REGISTRARUSUARIO(?,?,?,?,?,?,?,?,?,?,?)}";
        CallableStatement cst = null;
        try {
            conexion = conectar();
            cst = conexion.prepareCall(sql);
            cst.registerOutParameter(11, java.sql.Types.INTEGER);
            cst.setString(1, usuario.getNombre());
            cst.setString(2, usuario.getApellidos());
            cst.setString(3, usuario.getCorreo());
            cst.setString(4, usuario.getPassword());
            cst.setString(5, usuario.getDireccion());
            cst.setString(6, usuario.getTelefono());
            cst.setInt(7, 3);
            cst.setString(8, usuario.getCiudad());
            cst.setInt(9, 1);
            cst.setString(10, usuario.getCedula());
            cst.executeUpdate();
            int respuesta = cst.getInt(11);

            if (respuesta == 1) {
                return "TRUE";
            } else {
                return "FALSE";
            }

        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            if (cst != null) {
                cst.close();
            }

            conexion.close();
        }
        return "FALSE";
    }

    public List<Usuario> obtenerUsuarios() throws SQLException {
        List<Usuario> listaUsuarios;
        listaUsuarios = new ArrayList<>();

        StringBuilder sql = new StringBuilder();
        sql.append("{call OBTENERUSUARIOS(?)}");

        CallableStatement cst = null;        
        ResultSet rs = null;
        try {
            conexion = conectar();
          
            cst = conexion.prepareCall(sql.toString());
            cst.registerOutParameter(1, OracleTypes.CURSOR);
            cst.execute();
            rs=((OracleCallableStatement)cst).getCursor(1);

            while (rs.next()) {
                Usuario usuario = new Usuario();
                usuario.setId(rs.getInt("idusuario"));
                usuario.setNombre(rs.getString("nombre"));
                usuario.setApellidos(rs.getString("apellidos"));
                usuario.setTipo(rs.getString("tipousuario"));
                usuario.setTelefono(rs.getString("telefono"));
                usuario.setCedula(rs.getString("cedula"));
                usuario.setCorreo(rs.getString("correo"));
                usuario.setCiudad(rs.getString("ciudad"));
                listaUsuarios.add(usuario);
            }

        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
           
            if (rs != null) {
                rs.close();
            }
            conexion.close();

        }
        return listaUsuarios;
    }

    public String actualizarSinPassword(Usuario usuario) throws SQLException {
        String sql = "UPDATE usuarios SET nombre=?, apellidos=?, telefono=?, direccion=?, correo=?, ciudad=?, idtipo=? WHERE cedula=?";

        PreparedStatement ps = null;
        boolean rs = false;
        try {
            conexion = conectar();
            ps = conexion.prepareStatement(sql);
            ps.setString(1, usuario.getNombre());
            ps.setString(2, usuario.getApellidos());
            ps.setString(3, usuario.getTelefono());
            ps.setString(4, usuario.getDireccion());
            ps.setString(5, usuario.getCorreo());
            ps.setString(6, usuario.getCiudad());
            ps.setInt(7, Integer.parseInt(usuario.getTipo()));
            ps.setString(8, usuario.getCedula());
            int b = ps.executeUpdate();
            if (b == 1) {
                return "OK";
            } else {
                return "ERROR";
            }

        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
            return "ERROR";
        } finally {
            if (ps != null) {
                ps.close();
            }
            conexion.close();
        }

    }

    public String actualizarConPassword(Usuario usuario) throws SQLException {
        String sql = "UPDATE usuarios SET nombre=?, apellidos=?, telefono=?, direccion=?, password=?, correo=?, ciudad=?, idtipo=? WHERE cedula=?";

        PreparedStatement ps = null;
        boolean rs = false;
        try {
            conexion = conectar();
            ps = conexion.prepareStatement(sql);
            ps.setString(1, usuario.getNombre());
            ps.setString(2, usuario.getApellidos());
            ps.setString(3, usuario.getTelefono());
            ps.setString(4, usuario.getDireccion());
            ps.setString(5, usuario.getPassword());
            ps.setString(6, usuario.getCorreo());
            ps.setString(7, usuario.getCiudad());
            ps.setInt(8, Integer.parseInt(usuario.getTipo()));
            ps.setString(9, usuario.getCedula());
            int b = ps.executeUpdate();
            if (b == 1) {
                return "OK";
            } else {
                return "ERROR";
            }

        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
            return "ERROR";
        } finally {
            if (ps != null) {
                ps.close();
            }
            conexion.close();
        }
    }

    public List<Usuario> buscarUsuarioLike(String texto) throws SQLException {
        List<Usuario> lista = new ArrayList<>();
        String sql = "SELECT cedula, idusuario FROM usuarios WHERE cedula LIKE '%" + texto + "%' AND activo=1";

        PreparedStatement ps = null;
        ResultSet rs = null;
        try {
            conexion = conectar();
            ps = conexion.prepareStatement(sql);
            rs = ps.executeQuery();

            while (rs.next()) {
                Usuario usuario = new Usuario();
                usuario.setId(rs.getInt("idusuario"));
                usuario.setCedula(rs.getString("cedula"));
                lista.add(usuario);
            }

        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            if (ps != null) {
                ps.close();
            }
            if (rs != null) {
                rs.close();
            }
            conexion.close();
        }
        return lista;
    }

    public List<Usuario> buscarUsuarioEmpleadoLike(String texto) throws SQLException {
        List<Usuario> lista = new ArrayList<>();
        String sql = "SELECT cedula, idusuario FROM usuarios WHERE cedula LIKE '%" + texto + "%' AND activo=1  and idtipo=2";

        PreparedStatement ps = null;
        ResultSet rs = null;
        try {
            conexion = conectar();
            ps = conexion.prepareStatement(sql);
            rs = ps.executeQuery();

            while (rs.next()) {
                Usuario usuario = new Usuario();
                usuario.setId(rs.getInt("idusuario"));
                usuario.setCedula(rs.getString("cedula"));
                lista.add(usuario);
            }

        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            if (ps != null) {
                ps.close();
            }
            if (rs != null) {
                rs.close();
            }
            conexion.close();
        }
        return lista;
    }

    public String eliminar(String cedula) throws SQLException {
        String sql = "UPDATE usuarios SET activo=0 WHERE cedula='" + cedula + "'";

        PreparedStatement ps = null;
        try {
            conexion = conectar();
            ps = conexion.prepareStatement(sql);
            int b = ps.executeUpdate();
            if (b == 1) {
                return "OK";
            } else {
                return "ERROR";
            }

        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
            return "ERROR";
        } finally {
            if (ps != null) {
                ps.close();
            }
            conexion.close();
        }

    }

    public String agregarCategoriaEmpleado(int idCategoria, String cedula) throws SQLException {
        String sql = "INSERT INTO categoriasempleados values(" + idCategoria + ", (SELECT idusuario from usuarios where cedula='" + cedula + "'))";

        PreparedStatement ps = null;
        try {
            conexion = conectar();
            ps = conexion.prepareStatement(sql);
            int b = ps.executeUpdate();
            if (b == 1) {
                return "OK";
            } else {
                return "ERROR";
            }
        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
            return "ERROR";
        } finally {
            if (ps != null) {
                ps.close();
            }
            conexion.close();
        }
    }

    public String eliminarCategoriaEmpleado(int idCategoria, String cedula) throws SQLException {
        String sql = "DELETE from categoriasempleados where idcategoria=" + idCategoria + " AND idusuario= (SELECT idusuario from usuarios where cedula=" + cedula + ")";

        PreparedStatement ps = null;
        try {
            conexion = conectar();
            ps = conexion.prepareStatement(sql);
            int b = ps.executeUpdate();
            if (b == 1) {
                return "OK";
            } else {
                return "ERROR";
            }
        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
            return "ERROR";
        } finally {
            if (ps != null) {
                ps.close();
            }
            conexion.close();
        }
    }

    public List<Categoria> obtenerCategoriasEmpleado(String cedula) throws SQLException {
        List<Categoria> lista = null;
        lista = new ArrayList<>();
        String sql = "SELECT * from usuarios u INNER JOIN categoriasempleados ce ON u.idusuario=ce.idusuario"
                + " INNER JOIN categorias c ON c.idcategoria=ce.idcategoria "
                + " where u.cedula='" + cedula + "'";
        PreparedStatement ps = null;
        ResultSet rs = null;
        try {
            conexion = conectar();
            ps = conexion.prepareStatement(sql);
            rs = ps.executeQuery();

            while (rs.next()) {
                Categoria categoria = new Categoria();
                categoria.setCategoria(rs.getString("categoria"));
                categoria.setIdCategoria(rs.getInt("idcategoria"));
                lista.add(categoria);
            }

        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            if (ps != null) {
                ps.close();
            }
            if (rs != null) {
                rs.close();
            }
            conexion.close();
        }
        return lista;
    }

    public String validarUsuarioEmpleado(String cedula) throws SQLException {
        String sql = "SELECT * from usuarios u "
                + "inner join tipousuario tu on u.idtipo=tu.idtipo "
                + "where activo=1 and tu.tipousuario='empleado' and u.cedula='" + cedula + "'";
        int valido = 0;
        PreparedStatement ps = null;
        ResultSet rs = null;
        try {
            conexion = conectar();
            ps = conexion.prepareStatement(sql);
            rs = ps.executeQuery();

            while (rs.next()) {
                valido = 1;
            }
            if (valido == 1) {
                return "OK";
            } else {
                return "NO";
            }

        } catch (Exception ex) {
            Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            if (ps != null) {
                ps.close();
            }
            if (rs != null) {
                rs.close();
            }
            conexion.close();
        }
        return "NO";
    }
}
