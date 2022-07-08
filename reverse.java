import java.util.*;
import java.util.Scanner;
public class reverse
{
    public static void main(String... args)
    {
        Scanner sc = new Scanner(System.in);
        String str = sc.nextLine();
        char[] ch = str.toCharArray();
        for(int i = ch.length-1;i>=0;i--)
        {
          System.out.print(ch[i]);
            
        }
        System.out.println();
        StringBuilder input1 = new StringBuilder();
        input1.append(ch);
        input1.reverse();
        System.out.println(ch);
    }
}