import java.util.*;
import java.util.Scanner;

class Stringss
{
    public static void main(String[] args){
        String str1 = new String("Hello nhow are u");
        String str2 = new String("Hii i am nitesh");
        System.out.println("Strings are :" +str1);
        System.out.println("Strings are :" +str2);

        boolean camp = str2.equals(str1);
        System.out.println("String are " +camp);

        String joinss = String.join("", str1, str2);
        System.out.println("All string are :" +joinss);

        int len = joinss.length();
        System.out.println("The toital lenth are is = " +len);

        String rev = str1.reverse();
        System.out.println("Reverse string are : " +rev);


    }
}