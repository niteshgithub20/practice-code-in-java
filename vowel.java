import java.util.*;
import java.util.Scanner;
public class vowel
{
    public static void main(String... args)
    {
       Scanner sc = new Scanner(System.in);
       int a=0,e=0,i=0,o=0,u=0;
       System.out.println("Enetr the String");
       String str = sc.nextLine();
       int count=0;
       str = str.toLowerCase();
       System.out.println("after lower case"+str);
       Set<Character> list= new LinkedHashSet<Character>();
       for(int ii=0; ii < str.length(); ii++)
       {
         if(str.charAt(ii)=='a')
         {
           a++;
           list.add(str.charAt(ii));
         }
         else if(str.charAt(ii)=='e')
         {
           e++;
           list.add(str.charAt(ii));
         }
         else if(str.charAt(ii)=='i');
         {
            i++;
         }
         else if(str.charAt(ii)=='o');
         {
           o++;
           list.add(str.charAt(ii));
         }
         else if(str.charAt(ii)=='u');
         {
           u++;
           list.add(str.charAt(ii));
         }
       }
       if(c=='a'&& a>0)
       System.out.println("a="+a);
       if(c=='e'&& e>0)
       System.out.println("e="+e);
       if(c=='i'&& i>0)
       System.out.println("i="+i);
       if(c=='o'&& o>0)
       System.out.println("o="+o);
       if(c=='u' && u>0)
       System.out.println("u="+u);
    }
  }
}