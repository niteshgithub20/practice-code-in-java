import java.util.*;
import java.util.Scanner;
public class Pattern3
{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        int n,row,space,star,abtakkastar=1;
        n = sc.nextInt();
        for(row=1;row<=n;row++)
        {
            for(space=1;space<=n-row;space++)
            {
                System.out.println(" ");
            }
            for(star=1;star<=abtakkastar;star++)
            {
                System.out.print("*");
            }
            abtakkastar = abtakkastar+2;
        }
    }
}