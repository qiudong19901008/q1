class LocalStorager{

  private static _tokenKey='token';

  public static saveToken(token:string){
    localStorage.setItem(this._tokenKey,token);
  }

  public static getToken(){
    return localStorage.getItem(this._tokenKey);
  }

  public static removeToken(){
    localStorage.removeItem(this._tokenKey);
  }


}
export default LocalStorager;