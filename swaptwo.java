import java.util.*;
import java.util.Scanner;
public class swaptwo
{
    public static void main(String[] args)
   {
    Scanner sc = new Scanner(System.in);
    int i = sc.nextInt();
    int j = sc.nextInt();
    i = i+j;
    j = i-j;
    i = i-j;
    System.out.println("After swap:" +"i=" +i+ ",j=" +j);
   }
}