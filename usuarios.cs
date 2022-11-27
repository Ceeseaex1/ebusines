using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Bfngjzxjwvecjdvaz
{
    #region Usuarios
    public class Usuarios
    {
        #region Member Variables
        protected int _id;
        protected string _nombre;
        protected string _correo;
        protected string _usuario;
        protected string _clave;
        #endregion
        #region Constructors
        public Usuarios() { }
        public Usuarios(string nombre, string correo, string usuario, string clave)
        {
            this._nombre=nombre;
            this._correo=correo;
            this._usuario=usuario;
            this._clave=clave;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Nombre
        {
            get {return _nombre;}
            set {_nombre=value;}
        }
        public virtual string Correo
        {
            get {return _correo;}
            set {_correo=value;}
        }
        public virtual string Usuario
        {
            get {return _usuario;}
            set {_usuario=value;}
        }
        public virtual string Clave
        {
            get {return _clave;}
            set {_clave=value;}
        }
        #endregion
    }
    #endregion
}