import java.util.*;
import java.util.Scanner;
public class Hcf
{
    public static void main(String[] args){
       Scanner sc = new Scanner(System.in);
       System.out.println("Enter the two number ");
       int num1,num2,i,min,abtakkahcf;
       num1 = sc.nextInt();
       num2 = sc.nextInt();
       abtakkahcf=0;
       min = num1<num2 ? num1:num2;
       for(i=1;i<=min;i++)
       {
           if(num1%i==0 && num2%i==0)
           abtakkahcf = i;
       }
       System.out.println("The HCF are : "+abtakkahcf);

    }
}