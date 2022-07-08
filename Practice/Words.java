import java.util.*;
import java.io.*;
class Words{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        String str = sc.nextLine();
        String[] s = str.split(" ");
        String result = "";
        for(int i=0;i<s.length;i++){
            if(i == s.length-1){
                result = s[i]+result;
            }else{
                result = " "+s[i]+result;
            }
        }
        System.out.println(result);
    }
}