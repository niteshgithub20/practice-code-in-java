import java.util.*;
import java.io.*;
class Cwords{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        String str = sc.nextLine();
        String[] s = str.split(" ");
        String result= "";
        for(int i=0;i<s.length;i++){
            if(i == s.length-1){
                result = s[i]+result;
            }else{
                result = " "+s[i]+result;
            }
        }
        String[] st = result.split(" ");
        for(int i=0;i<st.length;i++){
            st[i] = st[i]+st[i].length();
            if(st[i]=='a'||st[i]=='e'||st[i]=='i'||st[i]=='o'||st[i]=='u'){
                System.out.print(st[i]+" ");
            }
        }
    }
}