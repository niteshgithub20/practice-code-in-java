import java.util.*;
import java.util.Scanner;
class Factoria
{
    public static void main(String[] args){
    Scanner sc = new Scanner(System.in);
    System.out.println("Enter the number");
    int num = sc.nextInt();
    int abtakkaprod = 0;
    for(int i=0;i<=num;i++)
    {
        abtakkaprod = abtakkaprod+i;
    }
    System.out.println("The factorial number is : "+abtakkaprod);
}
}